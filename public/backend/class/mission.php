<?php

class Mission
{
    private $id_event;
    private $id_benevole;

    public function __construct($id_event, $id_benevole)
    {
        $this->id_event = $id_event;
        $this->id_benevole = $id_benevole;
    }

    public function getIdEvent()
    {
        return $this->id_event;
    }

    public function setIdEvent($id_event)
    {
        $this->id_event = $id_event;
    }

    public function getIdBenevole()
    {
        return $this->id_benevole;
    }

    public function setIdBenevole($id_benevole)
    {
        $this->id_benevole = $id_benevole;
    }

    public function convertToArray()
    {
        return [
            $this->getIdEvent(),
            $this->getIdBenevole(),
        ];
    }

    public function addMission()
    {
        $file = fopen('../backend/class/dbMission.csv', 'ab');

        fputcsv($file, $this->convertToArray());

        fclose($file);
    }

    public function removeMission()
    {
        $data = array_map('str_getcsv', file('../backend/class/dbMission.csv'));

        $data = array_filter($data, function ($row) {
            return $row[0] != $this->getIdEvent() || $row[1] != $this->getIdBenevole();
        });

        $file = fopen('../backend/class/dbMission.csv', 'wb');
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }
}
?>
