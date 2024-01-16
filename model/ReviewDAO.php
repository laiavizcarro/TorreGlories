<?php

include_once 'config/db.php';
include_once 'Review.php';

/**
 * Objecte d'accés a dades Review
 */

class ReviewDAO {
    public static function getAllReviews() {

        $con = DB::connectDB();

        $query = "SELECT r.*, u.name as user_name FROM reviews r ";
        $query .= "INNER JOIN users u ON ";
        $stmt = $con->prepare("SELECT * FROM reviews");
    }



    public static function createReview(Review $review) {
        $review_id = $review->getId();
        $title = $review->getReviewTitle();
        $reviewText = $review->getReview();
        $order_id = $review->getOrderId();
        $date = $review->getDate(); 

        $con = DB::connectDB();

        $stmt = $con->prepare("INSERT INTO reviews (title, review, order_id, date) 
        VALUES (?, ?, ?, ?");
        $stmt->bind_param("ssis", $title, $reviewText, $order_id, $date);

        $stmt->execute();

        $stmt->close();
        $con->close();

    }
}



?>