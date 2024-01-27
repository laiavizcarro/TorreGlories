const reviewModal = document.getElementById('review-modal');
reviewModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget;
  const orderId = button.getAttribute('data-bs-orderId');
  document.getElementById("orderId").value = orderId;
})

function saveReview() {
    let reviewForm = document.getElementById("reviewForm");
    let orderId = document.getElementById("orderId").value;
    let title = document.getElementById("title").value;
    let rate = document.querySelector('input[name="rate"]:checked').value;
    let reviewText = document.getElementById("review").value;

    let review = {
        orderId: orderId,
        title: title,
        review: reviewText,
        rate: rate
    };

    fetch("http://localhost/DAW2/TorreGlories/api_index.php?controller=API&action=addReview", {
        method: 'POST',
        headers: {
            'Content-Type': 'application-json; charset=UTF-8'
        },
        body: JSON.stringify(review)
    })
    .then(response => response.json())
    .then(response => {
        if (response.success == true) {
            notie.alert({ type: 'success', text: response.message, time: 2 }) 
            document.querySelectorAll(`[data-bs-orderId="${orderId}"]`)[0].remove();
        } else {
            notie.alert({ type: 'error', text: response.message, time: 2 }) 
        }

       reviewForm.reset();
    });


    return false;

}