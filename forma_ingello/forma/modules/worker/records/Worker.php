<?php

namespace forma\modules\worker\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interview\InterviewSearch;
use forma\modules\vacancy\records\Vacancy;
use forma\modules\vacancy\records\VacancySearch;
use forma\modules\worker\records\workervacancy\WorkerVacancy;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "worker".
 *
 * @property int $id
 * @property int $status
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $date_birth
 * @property int $gender
 * @property boolean $collaborated
 * @property string $passport
 * @property string $apply_position
 * @property int $experience
 * @property string $experience_description
 * @property Worker $fullName
 * @property Worker $historyDialog
 * @property WorkerVacancy[] $workerVacancies
 * @property Interview[] $interviews
 */
class Worker extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $workerVacanciesArray;

    public static function tableName()
    {
        return 'worker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'gender', 'name', 'surname', 'patronymic', 'passport', 'apply_position'], 'required'],
            [['status', 'gender', 'experience'], 'integer'],
            [['date_birth'], 'safe'],
            [['collaborated'], 'boolean'],
            [['name', 'surname', 'patronymic', 'passport', 'apply_position'], 'string', 'max' => 255],
            [['experience_description'], 'string', 'max' => 65000]
        ];
    }


    public function getWorkerVacancies()
    {
        if ($this->getIsNewRecord()) {
            return [];
        }

        return ArrayHelper::getColumn(
            WorkerVacancy::findAll(['worker_id' => $this->id]),
            'vacancy_id'
        );
    }

    public function getHistoryDialog()
    {
        $fullHistory = '';

        $interviews = Interview::accessSearch(['worker_id' => $this->id])->getModels();

        if (!empty($interviews)) {
            foreach ($interviews as $interview) {
                $interview->dialog ?
                    $fullHistory .= $interview->dialog : null;
            }

            return $fullHistory;
        }

        return '?????????????? ???????????????? ??????????';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', '????????????????/????????????????'),
            'name' => Yii::t('app', '??????'),
            'surname' => Yii::t('app', '??????????????'),
            'patronymic' => Yii::t('app', '????????????????'),
            'date_birth' => Yii::t('app', '???????? ???????????????? '),
            'gender' => Yii::t('app', '??????'),
            'passport' => Yii::t('app', '?????????? ????????????????'),
            'apply_position' => Yii::t('app', '???????????????????? ???? ??????????????????'),
            'experience' => Yii::t('app', '???????? ????????????(??????)'),
            'experience_description' => Yii::t('app', '???????????????? ??????????'),
            'workerVacancies' => Yii::t('app', '?????????????????????????? ????????????????????'),
            'collaborated' => Yii::t('app', '?????????????????????????'),
            'historyDialog' => Yii::t('app', '?????????????? ????????????????'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviews()
    {
        return $this->hasMany(Interview::className(), ['worker_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

    public function getStatus()
    {
        return $this->status ? '(????????????????)' : '(????????????????)';
    }

    public function getCollaborated()
    {
        return $this->collaborated ? '????' : '??????';
    }

    /**
     * {@inheritdoc}
     * @return WorkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkerQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public static function getListQuery()
    {
        return EntityLister::getListQuery(self::className());
    }

    public function search($params)
    {
        $search = new WorkerSearch();

        return $search->search($params);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (isset($_POST['Worker']['workerVacancies'])) {

            WorkerVacancy::deleteAll(['worker_id' => $this->id]);
            if (is_array($_POST['Worker']['workerVacancies'])) {

                $workerVacancy = new WorkerVacancy();
                foreach ($_POST['Worker']['workerVacancies'] as $vacancyId) {
                    $workerVacancy->isNewRecord = true;
                    $workerVacancy->id = null;
                    $workerVacancy->setAttributes(['worker_id' => $this->id, 'vacancy_id' => $vacancyId]);

                    try {
                        $workerVacancy->save();
                    } catch (Exception $e) {

                    }
                }

            }
        }
    }
}
