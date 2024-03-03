function getData() {
  $.ajax({
    type: "POST",
    url: "../php/fetchData.php",
    success: function (data) {
      $("#gp-chats").html(data);
    },
  });
}
$("#load_chat").on("click", function () {
  getData();
});
getData();
$("#send-message").on("click", function (e) {
  e.preventDefault();
  var chatData = $("#chat").val();
  if (chatData == "") {
    alert("Please Insert Data");
  } else {
    $.ajax({
      url: "../php/saveChat.php",
      type: "POST",
      data: { chat: chatData },
      success: function (data) {
        if (data == 1) {
          getData();
          $("#submitForm").trigger("reset");
        } else {
          alert("Cannot Save Data");
        }
      },
    });
  }
});

$(document).on("click", ".del_chat", function () {
  if (confirm("Do you really want to delete this record ?")) {
    var chatId = $(this).data("id");
    var ele = this;
    $.ajax({
      url: "../php/del_chat.php",
      type: "POST",
      data: { id: chatId },
      success: function (data) {
        if (data == 1) {
          $(ele).closest("div").fadeOut();
        } else {
          alert("Encountered Error");
        }
      },
    });
  }
});
