<?php

class ReviewsModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getReviews($i_id)
    {
        $sql = "SELECT * FROM reviews WHERE item_id = :i_id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':i_id' => $i_id));
        return $query->fetchAll();
    }

	public function addreview($customer_id, $item, $item_review, $item_rating)
    {
       // $customer_id=$_SESSION["userid"];
        $sql = "INSERT INTO reviews (review_text, item_rating, item_id, customer_id) values (:item_review, :item_rating, :item, :customer_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':item_review' => $item_review, ':item_rating' => $item_rating, ':item' => $item, ':customer_id' => $customer_id));
    }
}
