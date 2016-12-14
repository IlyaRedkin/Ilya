//  Написать функцию преобразования цвета из 10-ного представления в 16-ный. Функция должна
// принимать 3 числа от 0 до 255 и возвращать строковый хеш.

function DecToHex (red, green, blue) {
	var color = {red, green, blue};
	for (var i=0; i<color.length; i++){
		if (color.i.length < 2) {
			color.i = '0' + color.i.toString(16);
		}
		else {
			color.i = color.i.toString(16);
		} 
	}
	return '#' + color;
}