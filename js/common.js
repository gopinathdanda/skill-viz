function toTitleCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
    });
}

function convert_camel(str){
	return toTitleCase(str.replace(/-/g, ' '));
}

function convert_dash(str){
	return str.toLowerCase().replace(/ /g, '-');
}

function replace_underscore(str){
	return str.replace(/_/g, ': ');
}