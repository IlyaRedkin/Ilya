//  Написать функцию преобразования цвета из 10-ного представления в 16-ный. Функция должна
// принимать 3 числа от 0 до 255 и возвращать строковый хеш.

function DecToHex (red, green, blue) {
	return '#' + toString(red) + toString(green) + toString(blue);
}