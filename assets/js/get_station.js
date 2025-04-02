$(document).ready(function () {
  $("#country").change(function () {
    let country_id = $("#country").val();
    $.ajax({
      url: "cart/country?country_id=" + country_id,
      type: "GET",
      dataType: "json", //JSON
      success: function (states) {
        let select = '';
        for (let index = 0; index < states.length; index++) {
          let state = states[index];
          select += '<option>' + state.name + '</option>'; 
         
        }
        document.querySelector("#states").innerHTML = select;
        // $("#states").html(select);
        // console.log();
        // $("#result").html("<p>Name: " + data.name + "</p>");
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
});

// console.log($('#country'));
