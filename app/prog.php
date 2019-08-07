<?php


namespace App;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class prog implements SplSubject
{
    private $prog_id;
    protected $obs;



    public function __construct($prog_id)
    {
        $this->obs=new SplObjectStorage();
        $this->prog_id = $prog_id;
    }

    public function attach(SplObserver $observer)
    {
        $this->obs->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $index = 0;
        foreach ($this->obs as $o){
            if($o == $observer){
                array_splice($this->obs,$index,1);
                return;
            }
            $index++;
        }
    }

    public function notify()
    {
        foreach($this->obs as $o){
            $o->update($this);
        }
    }
    /**
     * programme constructor.
     * @param string $primaryKey
     */


    /**
     * @return string
     */
    public function getProg_id()
    {
        return $this->prog_id;
    }

    /**
     * @param string $primaryKey
     */
    public function setProg_id($prog_id)
    {
        $this->prog_id = $prog_id;
        $this->notify();
    }
}
