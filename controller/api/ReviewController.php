<?php

include_once 'utils/Utils.php';
include_once 'model/Review.php';
include_once 'model/ReviewDAO.php';

class ReviewController {

    /**
     * Obté totes les ressenyes
     */

    public function getReviews() {
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $rateOrder = isset($_POST['rateOrder']) ? $_POST['rateOrder'] : null;
        
        $reviews = ReviewDAO::getAllReviews($rate, $rateOrder);

        foreach ($reviews as $review) {
            $review->setDate(date_format(date_create($review->getDate()), 'Y-m-d H:i'));
        }

        echo json_encode([
            "success" => true,
            "message" => null,
            "data" => Utils::toJsonArray($reviews)
        ]);

        return;
    }

    /**
     * Afegeix una ressenya nova sobre una comanda realitzada 
     * Cada comanda només pot tenir una ressenya
     */
    public function addReview() {
        $title = $_POST['title'];
        $reviewText = $_POST['review'];
        $rate = $_POST['rate'];
        $order_id = $_POST['orderId'];

        if(ReviewDAO::orderReviewExists($order_id) > 0) {
            echo json_encode([
                "success" => false,
                "message" => "Aquesta comanda ja té una ressenya.",
                "data" => null
            ]);
           
            return;
        }

        $review = new Review();
        $review->setTitle($title);
        $review->setReview($reviewText);
        $review->setRate($rate);
        $review->setOrderId($order_id);
        $review->setDate(date("Y-m-d H:i:s"));

        ReviewDAO::addReview($review);

        echo json_encode([
            "success" => true,
            "message" => "Ressenya insertada correctament",
            "data" => null
        ]);
       
        return;
    }
}

?>

