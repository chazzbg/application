<?php

namespace App\Listeners;

use JsonStreamingParser\Listener\SubsetConsumerListener;

class UniqueListener extends SubsetConsumerListener {

    protected $models = [];
    /**
     * @param mixed $data
     *
     * @return boolean if data was consumed and can be discarded
     */
    protected function consume( $data ) {

        if(!isset( $this->models[$data['model']])){
            $this->models[$data['model']] = 0;
        }
        $this->models[$data['model']] ++;
    }

    public function getModels() {
        return $this->models;
    }
}