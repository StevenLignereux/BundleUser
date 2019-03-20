<?php

namespace App\Gantt;

use App\Entity\User;
use jsh11\DhtmlxBundle\Gantt\AbstractGantt;

class UserGantt extends AbstractGantt
{
    /**
     * @return $this
     */
    public function configure()
    {
        $this->setAjax([
            'route_list' => 'user_index',
            'route_new' => 'user_new',
            'route_edit' => 'user_edit',
            'route_delete' => 'user_delete'
        ]);

        $this->setConfig([
            'date_grid' => "%d.%m.%Y",
            'step' => 1,
            'scale_unit' => 'day',
        ]);

        $this->setMapping([
            'id' => 'id',
            'text' => 'name',
            'start_date' => 'startAt',
            'duration' => 'duration',
            'progress' => 'advanced',
        ]);

        return $this;
    }

    public function getEntity()
    {
        return User::class;
    }

    public function getName()
    {
        return "user_gantt";
    }


}