<?php

namespace forma\extensions\fullcalendar\models;

/**
 * Class Resource
 * @package edofre\fullcalendarscheduler\models
 */
class Resource extends CalendarModel
{
    /** @var  string Uniquely identifies the given resource. */
    public $id;
    /** @var  string The text on an resource's element */
    public $title;
    /** @var  string Events associated with this resources will have their backgrounds and borders colored.
     * Any CSS string color format can be specified, like "#f00" or "rgb(255,0,0)".
     * This value will take precedence over the global eventColor option and the Event Source Object color option,
     * but it will not take precedence over the Event Object color option.
     */
    public $eventColor;
    /** @var  string Like eventColor but only for the background color */
    public $eventBackgroundColor;
    /** @var  string Like eventColor but only for the border color */
    public $eventBorderColor;
    /** @var  string Like eventColor but only for the text color */
    public $eventTextColor;
    /** @var  string ClassName(s) that will apply to events */
    public $eventClassName;
    /** @var  array Children is an array of child Resource Objects */
    public $children = [];
    /** @var  string Reference to the parent */
    public $parentId;
    /** @var  string Parent is a reference to the parent Resource Object. It will be null if there is no parent. */
    public $parent;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['eventColor', 'eventBackgroundColor', 'eventBorderColor', 'eventTextColor', 'eventClassName', 'children', 'parentId', 'parent'], 'safe'],
        ];
    }
}
