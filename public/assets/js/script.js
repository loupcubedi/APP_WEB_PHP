$( "#Search" ).autocomplete({

    source: function (request, response) {
        $.ajax({
            url: "http://www.cesi.local/ApiArticle/search",
            dataType: "json",
            data: {"keyword": request.term},
            contentType: "application/json",
            method: "GET",
            success: function (data) {
                console.log(data);
                var transformed = $.map(data, function (el) {
                    return {
                        label: el.Titre,
                        id: el.id
                    };
                });
                response(transformed);
            },
            error: function () {
                response([]);
            }
        });
    }
});
