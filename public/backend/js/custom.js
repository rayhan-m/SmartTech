// $(document).ready(function() {
//     $("select.order_id").change(function() {
//         var selectedCountry = $(this)
//             .children("option:selected")
//             .val();
//         alert("You have selected the country - " + selectedCountry);
//     });
// });

// function getPayment(a) {
//     console.log("selected");
//     var id = a.value || a.options[a.selectedIndex].value;
//     var url = document.getElementById("url").value();
//     var formdata = {
//         id: id
//     };
//     $.ajax({
//         type: "GET",
//         data: formData,
//         dataType: "json",
//         url: url + "/" + "ajaxSubjectDropdown",
//         success: function(data) {},
//         error: function(data) {
//             console.log("Error:", data);
//         }
//     });
// }
// $(document).ready(function() {
//     $("#order_id").change(function() {
//         var url = $("#url").val();
//         var formData = {
//             id: $(this).val()
//         };
//         console.log(formData);
//         // get subjects dropdown
//         $.ajax({
//             type: "GET",
//             data: formData,
//             dataType: "json",
//             url: url + "/order-info/ajax/" + OrderInfo,
//             success: function(data) {},
//             error: function(data) {
//                 console.log("Error:", data);
//             }
//         });
//     });
// });