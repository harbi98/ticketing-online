import './bootstrap';
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     encrypted: true,
// });

// // Listen for SaleCreated event
// window.Echo.channel('sales')
//     .listen('SaleCreated', (event) => {
//         const salesTableBody = document.getElementById('myTable');
//         const existingRow = Array.from(salesTableBody.rows).find(row => row.cells[0].textContent === event.reference_num);

//         // Ensure the price and quantity are valid numbers
//         const ticketPrice = parseFloat(event.total_price); // Ensure you're using the correct property here
//         const ticketQuantity = parseInt(event.customer_quantity);

//         if (isNaN(ticketPrice) || isNaN(ticketQuantity)) {
//             console.error('Invalid price or quantity:', { ticketPrice, ticketQuantity });
//             return; // Exit if values are invalid
//         }

//         if (existingRow) {
//             // Update existing row
//             const existingQuantityCell = existingRow.cells[2];
//             const existingTotalCell = existingRow.cells[1];

//             const existingQuantity = parseInt(existingQuantityCell.textContent);
//             const newQuantity = existingQuantity + ticketQuantity;

//             const newTotalPrice = ticketPrice * newQuantity;

//             existingQuantityCell.textContent = newQuantity;
//             existingTotalCell.textContent = `₱ ${newTotalPrice.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;

            
//         } else {
//             // Create new row
//             const totalPrice = ticketPrice * ticketQuantity;

//             const newRow = document.createElement('tr');
//             newRow.innerHTML = `
//                 <td>${event.reference_num}</td>
//                 <td class="count-me">₱ ${totalPrice.toLocaleString(undefined, { minimumFractionDigits: 2 })}</td>
//                 <td>${ticketQuantity}</td>
//                 <td>${event.customer_name}</td>
//                 <td>${event.customer_email}</td>
//                 <td>${event.customer_contact}</td>
//                 <td>
//                     <a href="#" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center edit_sales" data-sale-id="${event.reference_num}" data-bs-toggle="modal" data-bs-target="#editSale">
//                         <i class='bx bx-edit-alt'></i>&nbsp;Edit
//                     </a>
//                 </td>
//             `;
//             salesTableBody.insertBefore(newRow, salesTableBody.firstChild);
//         }
//     });




// window.Echo.channel('sales')
//     .listen('SaleCreated', (event) => {
//         console.log('SaleCreated event received:', event);
//         //Get table body
//         const salesTableBody = document.getElementById('myTable');
//         //Create new row
//         const newRow = document.createElement('tr');
//         //Populate row with data from event
//         newRow.innerHTML = `
//             <td>${event.reference_num}</td>
//             <td class="count-me">₱ ${parseFloat(event.total_price).toLocaleString(undefined, { minimumFractionDigits: 2 })}</td>
//             <td>${event.customer_quantity}</td>
//             <td>${event.customer_name}</td>
//             <td>${event.customer_email}</td>
//             <td>${event.customer_contact}</td>
//             <td>
//                 <a href="#" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center edit_sales" data-sale-id="${event.reference_num}" data-bs-toggle="modal" data-bs-target="#editSale">
//                     <i class='bx bx-edit-alt'></i>&nbsp;Edit
//                 </a>
//             </td>
//         `;
//         //Append new row to table body
//         salesTableBody.appendChild(newRow);
//     });



// import './bootstrap';
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your_pusher_app_key',
//     cluster: 'your_pusher_app_cluster',
//     encrypted: true,
// });
