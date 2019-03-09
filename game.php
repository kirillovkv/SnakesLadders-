<?php
class Snake 
{
    private $pos;
    private $type;

    function __construct(){
        $this->pos = 0;
        while (true) {
            $this->type = '';
            $this->bones = rand(1,6);
            if($this->getPos() >= 94){
                if(($this->getPos() + $this->bones) == 100){
                    $this->plusPos($this->bones);
                }
            }
            else{
                $this->plusPos($this->bones);
            }
            if($this->getPos() == 25 || $this->getPos() == 55){
                $this->type = 'ladder';
            }
            if($this->getPos() % 9 == 0) {
                $this->type = 'snake';
                $this->plusPos(3,true);
            }
            $this->echoResult($this->bones);
            sleep(1);
        }
    }

    private function echoResult(){
        echo $this->bones."-".$this->type.$this->getPos()."\n";
        if($this->getPos() >= 100){
            exit();
        }
    }

    private function plusPos($bones,$snake = false){
        if($snake == true){
            $this->pos = ($this->pos-$this->bones)+$bones;
        }else{
            $this->pos += $bones;
        }
    }

    private function getPos(){
        return $this->pos;
    }
}
$snake = new Snake();
