
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){
    //-- Add New Book Action
    $("#modal-addbook-form").submit(function(e) {
        e.preventDefault();
        var searchBook = $('.modal-addbook-input').val();
        $("#search-result-books").empty();

        $.get("https://www.googleapis.com/books/v1/volumes?q=" + searchBook, function(response) {
            for (var i=0;i<response.items.length;i++) {
                var image_url ='https://islandpress.org/sites/default/files/400px%20x%20600px-r01BookNotPictured.jpg';
                var title = '';
                var author = '';
                var isbn = 'none';
                var currentBookInfo = '';
                title = response.items[i].volumeInfo.title;
                author = response.items[i].volumeInfo.authors;

                if(response.items[i].volumeInfo.industryIdentifiers != undefined ) {
                    if(response.items[i].volumeInfo.industryIdentifiers[1] != undefined &&
                        response.items[i].volumeInfo.industryIdentifiers[1].identifier != undefined) {
                        isbn = response.items[i].volumeInfo.industryIdentifiers[1].identifier;
                    }
                    else {
                        if(response.items[i].volumeInfo.industryIdentifiers[0].identifier != undefined) {
                            isbn = response.items[i].volumeInfo.industryIdentifiers[0].identifier
                        }
                    }
                }
                else {
                    isbn = "none";
                }
                if(response.items[i].volumeInfo.imageLinks != undefined) {
                    image_url = response.items[i].volumeInfo.imageLinks.thumbnail;
                }

                currentBookInfo = $('<div class="col-3 search-result-book-item">\n' +
                    '                    <img class="img-fluid search-result-book-img" src="' + image_url + '"/>\n' +
                    '                    <div class="book-info">\n' +
                    '                    <span class="book-name">'+ title + '</span></br>by\n' +
                    '                <span class="book-author">' + author +'</span></br>isbn: \n' +
                    '                <span class="book-isbn">'+ isbn + '</span>\n' +
                    '                </div>\n' +
                    '                ' + '<button class="btn modal-addbook-btn" book-title="aa">Add This Book</button>' +
                    '</div>');

                currentBookInfo.appendTo('#search-result-books')
                    .ready(function() {
                        var classname = document.getElementsByClassName("modal-addbook-btn");
                        for(var j=0;j<classname.length;j++){
                            classname[j].addEventListener('click', addBook, false);
                        }
                });
            }
        });
    });

    function addBook() {
        var currentBtn = $(this);
        var title = $(this).parent().children(".book-info").children(".book-name").html();
        var author = $(this).parent().children(".book-info").children(".book-author").html();
        var isbn = $(this).parent().children(".book-info").children(".book-isbn").html();
        var image_url = $(this).parent().children(".search-result-book-img").attr("src");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/addbook",
            method: 'post',
            data: {
                title: title,
                author: author,
                isbn: isbn,
                image_url: image_url,
            },
            success: function(result){
                if(result.success===1) {
                    currentBtn.html("Added Successfully");
                    currentBtn.prop('disabled', true);
                }
            },
            error: function(err) {
                if(err.statusText==="Unauthorized"){
                    $(".modal-error-message").html("Error: You can add book after login. <a href='/loginpage'>Cick here</a>");
                }
            }
        });
    }
    //-- End Add New Book Action /
});

