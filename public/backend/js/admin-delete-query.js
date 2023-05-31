function getPlan(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("plan_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-plan?id=" + parameter);
}

function getUser(parameter) {
    "use strict";
    $("#status-modal").modal("show");
    var link = document.getElementById("user_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/update-status?id=" + parameter);
}

function deleteUser(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("deleted_user_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-user?id=" + parameter);
}



function deleteBlogPost(parameter) {
    "use strict";
    $("#DeletePost").modal("show");
    var link = document.getElementById("delete_post_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/blog/delete?id=" + parameter);
}

function deleteCategory(parameter) {
    "use strict";
    $("#DeleteCategory").modal("show");
    var link = document.getElementById("delete_category_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/category/delete?id=" + parameter);
}

function getPaymentMethod(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("payment_gateway_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/delete-payment-method?id=" + parameter);
}

function getTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/transaction-status/" + parameter + "/SUCCESS");
}

function getOfflineTransaction(parameter) {
    "use strict";
    $("#delete-modal").modal("show");
    var link = document.getElementById("transaction_id");
    link.getAttribute("href");
    link.setAttribute("href", "/admin/offline-transaction-status/" + parameter + "/SUCCESS");
}

function loginUser(parameter) {
    "use strict";
    $("#login-modal").modal("show");
}