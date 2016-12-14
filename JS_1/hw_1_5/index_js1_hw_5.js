//  Написать функцию преобразования цвета из 10-ного представления в 16-ный. Функция должна
// принимать 3 числа от 0 до 255 и возвращать строковый хеш.

function DecToHex (red, green, blue) {
	var color = {red, green, blue};
	for (key in color){
		if (color[key].length < 2) {
			color[key] = '0' + color[key].toString(16);
		}
		else {
			color[key] = color[key].toString(16);
		} 
	}	
	return '#' + color;
}	