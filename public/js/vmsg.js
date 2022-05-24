$(document).ready(function () {
      $('.chat-list li').on('click', function () {
        let selectedlist = $(this).find('#qcon').text();
        let selectedname = $(this).find('#qname').text();
        let selectedphone = $(this).find('#qphone').text();
        $('.chat-history p').html(selectedlist);
        $('.chat-about #pun').html(selectedname);
        $('.chat-history #pupho').html(selectedphone);
        alert(selectedlist);
      });
    });