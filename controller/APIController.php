<?php

include_once 'utils/Utils.php';
include_once 'model/Review.php';
include_once 'model/ReviewDAO.php';

class APIController {

    /**
     * Constructor
     */
    function __construct() {
        $_POST = json_decode(file_get_contents('php://input'), true);
    }

    public function getReviews() {
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $rateOrder = isset($_POST['rateOrder']) ? $_POST['rateOrder'] : null;
        
        $reviews = ReviewDAO::getAllReviews($rate, $rateOrder);

        echo json_encode([
            "success" => true,
            "message" => null,
            "data" => Utils::toJsonArray($reviews)
        ]);

        return;
    }

    public function addReview() {
    
        $title = $_POST['title'];
        $reviewText = $_POST['review'];
        $rate = $_POST['rate'];
        $order_id = 1; // TODO: Canviar aixo
        $date = date("Y-m-d H:i:s");

        $review = new Review();
        $review->setReviewTitle($title);
        $review->setReview($reviewText);
        $review->setRate($rate);
        $review->setOrderId($order_id);
        $review->setDate($date);

        ReviewDAO::addReview($review);

        echo json_encode(['success' => true, 'message' => 'Ressenya insertada correctament']);

        return;
    }
}

?>

