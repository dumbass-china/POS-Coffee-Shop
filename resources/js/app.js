import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    // Get all the spans in ice and sugar groups within each card
    var cards = document.querySelectorAll('.card');

    cards.forEach(function (card) {
        var iceSpans = card.querySelectorAll('.ice span');
        var sugarSpans = card.querySelectorAll('.sugar span');

        // Function to deselect all spans in a group except the clicked one
        function deselectAllExceptClicked(spans, clickedSpan) {
            spans.forEach(function (span) {
                if (span !== clickedSpan) {
                    span.parentElement.classList.remove('selected');
                }
            });
        }

        // Add click event listener to each span in ice group
        iceSpans.forEach(function (span) {
            span.addEventListener('click', function () {
                // Toggle 'selected' class on the parent of the clicked span
                this.parentElement.classList.toggle('selected');
                // Deselect all other spans in the ice group
                deselectAllExceptClicked(iceSpans, this);
            });
        });

        // Add click event listener to each span in sugar group
        sugarSpans.forEach(function (span) {
            span.addEventListener('click', function () {
                // Toggle 'selected' class on the parent of the clicked span
                this.parentElement.classList.toggle('selected');
                // Deselect all other spans in the sugar group
                deselectAllExceptClicked(sugarSpans, this);
            });
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var cartButtons = document.querySelectorAll('.cart-button');

    cartButtons.forEach(function (cartButton) {
        var itemCount = 0;
        var itemCounter = cartButton.querySelector('.item-counter');
        var cartIcon = cartButton.querySelector('.add-item');

        cartButton.addEventListener('click', function () {
            itemCount++;
            itemCounter.textContent = itemCount;
            itemCounter.style.display = 'inline';
            cartIcon.style.display = 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var cartButtons = document.querySelectorAll('.cart-button');
    var cartItems = []; // Array to store cart items
    var itemCount = 0; // Variable to store the total item count

    cartButtons.forEach(function (cartButton) {
        cartButton.addEventListener('click', function () {
            var card = cartButton.closest('.card');
            console.log(card); // Check if the card element is selected correctly

            var itemName = card.querySelector('.title-price').textContent.trim();
            console.log(itemName); // Check if the item name is retrieved correctly

            var itemPriceText = card.querySelector('.title-price span').textContent.trim();
            console.log(itemPriceText); // Check if the item price text is retrieved correctly

            var itemPrice = parseFloat(itemPriceText.replace('$', '')); // Remove the '$' sign and convert to float
            console.log(itemPrice); // Check if the item price is parsed correctly

            var icePercentage = card.querySelector('.ice.selected span').textContent.trim();
            console.log(icePercentage); // Check if the ice percentage is retrieved correctly

            var sugarPercentage = card.querySelector('.sugar.selected span').textContent.trim();
            console.log(sugarPercentage); // Check if the sugar percentage is retrieved correctly

            var item = {
                name: itemName,
                price: itemPrice,
                icePercentage: icePercentage,
                sugarPercentage: sugarPercentage,
                count: ++itemCount // Increment item count and assign it to the item object
            };

            cartItems.push(item); // Add the item to the cartItems array

            // Update UI
            var itemCounter = cartButton.querySelector('.item-counter');
            var cartIcon = cartButton.querySelector('.add-item');
            itemCounter.textContent = itemCount;
            itemCounter.style.display = 'inline';
            cartIcon.style.display = 'none';

            console.log('Item added to cart:', item);
        });
    });

    // Function to retrieve cart items
    function getCartItems() {
        return cartItems;
    }
});
