<?php
namespace app\models;

use Yii;
use yii\data\Sort;
use yii\db\ActiveRecord;

class dayresult extends ActiveRecord{

    public static function getAll($userId){

        return self::find()->asArray()->where("user_id = '$userId'")->orderBy('date')->all();
        
    }

    public static function getAllPagination($userId){

        return self::find()->asArray()->where("user_id = '$userId'")->orderBy('date');

    }

    public static function addRow($date, $result, $listResult, $userId){
        $query = new dayresult();
        $query->date = $date;
        $query->result = $result;
        $query->listResult = $listResult;
        $query->user_id = $userId;

        $query->save();
    }
        
    public static function delAll($id)
    {
        $delete = dayresult::findOne($id);
        $delete->delete();
    }

    public static function getDataShedule($dayResult){

            $sort = new Sort([
                'attributes' => [
                    'date'
                ],
            ]);

            $query = dayresult::getAllPagination(Yii::$app->getUser()->id);

            $pages = new Pagination(['totalCount' => $query->count(),  'pageSize' => 4]);

            $models = $query->offset($pages->offset)
                ->limit($pages->limit)->orderBy($sort->orders)
                ->all();

            foreach ($dayResult as $item)
            {
                $getDayResultDate[] = $item['date'];
                $getDayResultCount[] = (int)($item['result']  * 100 / count($allNameEx));
                $getDayResultList[] = $item['listResult'];
            }

            return [
                'sort' => $sort,
                'pages' => $pages,
                'models' => $models,
                'getDayResultDate' => $getDayResultDate,
                'getDayResultCount' => $getDayResultCount,
                'getDayResultList' => $getDayResultList
            ];

        }

}
