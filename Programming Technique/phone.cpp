#include "phone.h"
#include <iostream>
#include <string>

using namespace std;

int main(){
	phone apple;
	phone huawei;
	phone samsung;
	
	std::string brand, material;
	double price, screensize;
	int batterylife;


	cout << "Please insert phone brand... (Apple/Samsung/Huawei)" << endl;
	getline(cin , brand);

if (brand=="apple"||brand=="Apple"||brand=="APPLE"){

	apple.setphone_brand(brand);
	cout << "Enter your Apple phone material... (Glass/Aluminium/Plastic)" << endl;
	cin >> material;
	apple.setphone_material(material);
	cout << "Enter your Apple phone price... (RM)" << endl;
	cin >> price;
	apple.setphone_price(price);
	cout <<"Enter your Apple phone size... (in inches)" << endl;
	cin >> screensize;
	apple.setphone_screensize(screensize);
	cout << "Enter your Apple phone battery life (in hours)" << endl;
	cin >> batterylife;
	apple.setphone_batterylife(batterylife);

system("CLS");

	cout << "Brand: " << apple.getphone_brand() << endl;
	cout << "Material: " << apple.getphone_material() <<endl;
	cout << "Price: RM" << apple.getphone_price() <<endl;
	cout << "Size: " << apple.getphone_screensize() <<" inch"<<endl;
	cout << "Battery life: " << apple.getphone_batterylife() <<" hour(s)" << endl;
}
if (brand=="huawei"||brand=="Huawei"||brand=="HUAWEI"){

huawei.setphone_brand(brand);
	cout << "Enter your Huawei phone material... (Glass/Aluminium/Plastic)" << endl;
	cin >> material;
huawei.setphone_material(material);
	cout << "Enter your Huawei phone price... (RM)" << endl;
	cin >> price;
huawei.setphone_price(price);
	cout <<"Enter your Huawei phone size... (in inches)" << endl;
	cin >> screensize;
huawei.setphone_screensize(screensize);
	cout << "Enter your Huawei phone battery life (in hours)" << endl;
	cin >> batterylife;
huawei.setphone_batterylife(batterylife);

system("CLS");

	cout << "Brand: " << huawei.getphone_brand() << endl;
	cout << "Material: " << huawei.getphone_material() <<endl;
	cout << "Price: RM" << huawei.getphone_price() <<endl;
	cout << "Size: " << huawei.getphone_screensize() <<" inch"<<endl;
	cout << "Battery life: " << huawei.getphone_batterylife() <<" hour(s)"<<endl;
}
if (brand=="samsung"||brand=="Samsung"||brand=="SAMSUNG"){

samsung.setphone_brand(brand);
	cout << "Enter your Samsung phone material... (Glass/Aluminium/Plastic)" << endl;
	cin >> material;
samsung.setphone_material(material);
	cout << "Enter your Samsung phone price... (RM)" << endl;
	cin >> price;
samsung.setphone_price(price);
	cout <<"Enter your Samsung phone size... (in inches)" << endl;
	cin >> screensize;
samsung.setphone_screensize(screensize);
	cout << "Enter your Samsung phone battery life (in hours)" << endl;
	cin >> batterylife;
samsung.setphone_batterylife(batterylife);

system("CLS");

	cout << "Brand: " << samsung.getphone_brand() << endl;
	cout << "Material: " << samsung.getphone_material() <<endl;
	cout << "Price: RM" << samsung.getphone_price() <<endl;
	cout << "Size: " << samsung.getphone_screensize() <<" inch"<<endl;
	cout << "Battery life: " << samsung.getphone_batterylife() <<" hour(s)"<<endl;
}
}







