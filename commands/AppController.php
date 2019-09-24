<?php


namespace app\commands;

use app\models\Activity;
use app\models\User;
use Yii;
use yii\console\Controller;

/**
 * Class AppController
 * Управление данными на начальном этапе
 * @package app\commands
 *
 */
class AppController extends Controller
{
    /**
     * Создание начальных пользователей (admin, manager, user)
     */
    public function actionUsers()
    {
        $users = [
            'manager',
            'user'
        ];

        foreach ($users as $login) {
            $user = new User([
                'username' => $login,
                'password_reset_token' => "{$login}-token",
                'email' => "{$login}@mail.ru",
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $user->generateAuthKey();
            $user->password = '123123';

            $user->save();
        }
    }

    public function actionActivities()
    {
        $titles = [
            'Первое событие',
            'Второе событие',
            'Третье событие',
            'Четвертое событие',
        ];

        $day = 1;
        $today = time();

        foreach ($titles as $title) {
            $activityDate = date(Yii::$app->params['formatDate'], strtotime("+{$day} days", $today));

            $activity = new Activity([
                'title' => $title,
                'description' => chunk_split(Yii::$app->security->generateRandomString(50), random_int(10, 30), ' '),
                'user_id' => random_int(1, 3),
                'day_start' => $activityDate,
                'day_end' => $activityDate,
                'blocked' => random_int(0, 1),
                'repeat' => false,
            ]);

            $activity->save();

            $day++;
        }
    }


}