var submitResponse = function(url) {
    var form = document.getElementById('userCreate');
    form.action = url;
    form.submit();
};