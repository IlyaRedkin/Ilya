//  Написать функцию преобразования цвета из 10-ного представления в 16-ный. Функция должна
// принимать 3 числа от 0 до 255 и возвращать строковый хеш.

function DecToHex (red, green, blue) {
	var color = [red, green, blue];
	var color_16 = '';
	for (var i=0; i<color.length; i++){
		if(color[i] > 255 || color[i] < 0){
			return console.log('Please enter value form 0 to 255');	
		} 
		if (String(color[i]).length < 2) {
			color_16 += '0' + color[i].toString(16);
		}
		else {
			color_16 += color[i].toString(16);
		} 
	}	
	return '#' + color_16;
}	

// Написать функцию, преобразующую число в объект. Передавая на вход число от 0 до 999, мы
// должны получить на выходе объект, в котором в соответствующих свойствах описаны единицы,
// десятки и сотни. Например для числа 245 мы должны получить следующий объект: {‘единицы’: 5,
// ‘десятки’: 4, 'сотни’: 2}. Если число превышает 999, необходимо выдать соответствующее
// сообщение с помощью console.log и вернуть пустой объект.

function NumToObj(number){
	var digit = {};
	if(number>999 || number<0){
		return console.log('please enter number from 0 to 999');
	}

	var a2 = Math.floor(number/100);
	number = number - a2*100;
	var a1 = Math.floor(number/10);
	number = number - a1*10;
	digit['\'единицы\''] = number;
	digit['\'десятки\''] = a1;
	digit['\'сотни\''] = a2;
	return digit;
}

// * Реализовать функцию objectToQueryString(object), которая принимает аргументом объект,
// возвращает строку. Примеры работы:
// console ​.log(objectToQueryString({user: ​'Dmitry' ​})); ​// user=Dmitry
// console ​.log(objectToQueryString({user: ​'Dmitry' ​, password: ​'pass' ​})); ​// user=Dmitry&password=pass 
// ​console ​.log(objectToQueryString({user: ​'Dmitry' ​, password: 'pass' ​, id= ​1 ​})); ​// user=Dmitry&password=pass&id=1

function objectToQueryString(object){
	return String(object);
}