require('./bootstrap');
var CodeMirror = require('codemirror');
require('codemirror/mode/clike/clike');
require('codemirror/mode/javascript/javascript');
require('codemirror/mode/css/css');
require('codemirror/mode/xml/xml');
require('codemirror/mode/htmlmixed/htmlmixed');
require('codemirror/mode/php/php');

$(document).ready(function() {

    console.log(CodeMirror.modes);
    var myCodeMirror = CodeMirror(document.getElementById('editor'), {
        lineNumbers: true,
        theme: 'darcula',
        value: $('#pasta-body').text(),
        mode: $('#editor').attr('data-syntax'),
        readOnly: true
    });
});
