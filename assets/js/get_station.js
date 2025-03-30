
$(document).ready(function () {
    $("#country").change(function () {
        let country_id = $("#country").val();
    $.ajax({
      url: "cart/country?country_id=" + country_id,
      type: "GET",
      dataType: "json", //JSON
        success: function (data) {
            console.log(data);
        // $("#result").html("<p>Name: " + data.name + "</p>");
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
});

// console.log($('#country'));
