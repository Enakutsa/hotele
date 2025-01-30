document.addEventListener("DOMContentLoaded", function () {
    const cart = [];
    const cartList = document.getElementById("cart-list");
    const totalPrice = document.getElementById("total-price");
    
    function updateCart() {
        cartList.innerHTML = "";
        let total = 0;
        cart.forEach((room, index) => {
            total += room.price;
            const li = document.createElement("li");
            li.textContent = `${room.name} - ${room.price} FCFA`;
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Retirer";
            removeBtn.onclick = function () {
                cart.splice(index, 1);
                updateCart();
            };
            li.appendChild(removeBtn);
            cartList.appendChild(li);
        });
        totalPrice.textContent = total;
    }
    
    document.querySelectorAll(".room-card").forEach(roomCard => {
        const name = roomCard.getAttribute("data-name");
        const price = parseInt(roomCard.getAttribute("data-price"));

        const addButton = roomCard.querySelector(".add-to-cart");
        const reserveButton = document.createElement("button");
        reserveButton.textContent = "Réserver";
        reserveButton.classList.add("reserve-btn");
        
        addButton.after(reserveButton);
        
        addButton.addEventListener("click", function () {
            cart.push({ name, price });
            updateCart();
            alert(`Vous avez ajouté ${name} avec succès !`);
        });

        reserveButton.addEventListener("click", function () {
            const queryParams = cart.map(room => `room=${encodeURIComponent(room.name)}`).join("&");
            window.location.href = `reservation.html?${queryParams}`;
            alert("Appuyer sur ok pour reserver");
        });
    });
});


// reservation
document.getElementById('reservationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('successMessage').textContent = 'Réserver avec succès';
});
