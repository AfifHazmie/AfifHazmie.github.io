#include "car.h"
#include <iostream>



using namespace std;

int main()
{
	string name;
	int year;
	car toyota;
	car nissan;
	car mclaren;

	
	cout << "Please insert car name... ";
	cin >> name;
	
	if (name=="toyota"||name=="Toyota"||name=="TOYOTA"){
	
	toyota.setcar_name(name);
	cout <<"Car name: "<< toyota.getcar_name() << endl;
	cout << "Please insert your Toyota car year... ";
	cin >> year;
	toyota.setcaryear(year);
	cout << "Toyota car year: "<< toyota.getcaryear() << endl;
	cout << "Please insert your Toyota car model... ";
}
	if (name=="nissan"||name=="Nissan"||name=="NISSAN"){
	
	nissan.setcar_name(name);
	cout <<"Car name: "<< nissan.getcar_name() << endl;
	cout << "Please insert your Nissan car year... ";
	cin >> year;
	nissan.setcaryear(year);
	cout << "Nissan car year: "<< nissan.getcaryear() << endl;
	cout << "Please insert your Nissan car model... ";
	}
	
    
}
