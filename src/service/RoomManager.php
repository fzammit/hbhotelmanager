<?php
namespace App\Service;

use App\Model\Room;
use PDO;

class RoomManager extends AbstractManager implements ManagerInterface {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
    }

    /**
     * @param array $array
     * @return Room
     */
    public function arrayToObject(array $array)
    {
        $room = new Room;
        $room->setId($array['id']);
        $room->setNumber($array['number']);
        $room->setClientId($array['client_id']);
        
        // $room->setClient(); // à faire

        return $room;
    }

    /**
     * @return Room[]
     */
    public function findAll()
    {
        $query = "SELECT * FROM room";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $rooms = [];

        foreach($data as $d) {
            $rooms[] = $this->arrayToObject($d);
        }

        return $rooms;
    }

    /**
     * @param int $id
     * @return Room
     */
    public function findOneById(int $id)
    {
        $query = "SELECT * FROM room WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['id' => $id]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        $room = $this->arrayToObject($data);

        return $room;
    }

    /**
     * @param string $field
     * @param string $value
     * @return Room[]
     */
    public function findByField(string $field, string $value)
    {
    }

    /**
     * @param array $data
     */
    public function create(array $data) {
        $query = "INSERT INTO room(number) VALUES(:number)";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'number' => $data['number'],
        ]);
    }

    /**
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        $query = "UPDATE room SET number = :number, client_id = :client_id WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id,
            'number' => $data['number'],
            'client_id'  => $data['client_id']
        ]);

    }

    public function delete(int $id) {
        $query = "DELETE FROM room WHERE id = :id";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'id' => $id,
        ]);
    }
}