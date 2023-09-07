export function getBigNumbers(array, length){
    array.sort(function(a, b) {
        return a - b;
    });
    return array.slice(-length);
}

export function roundNumber(number) {
    const multiple = Math.pow(10, 1);
    return Math.round(number * multiple) / multiple;
}