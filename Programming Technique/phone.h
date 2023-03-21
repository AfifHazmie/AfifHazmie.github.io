#include <iostream>
#ifndef PHONE_H
#define PHONE_H
#include<string>

class phone
{
	private:
	std::string phone_brand;
	std::string phone_material;
	double phone_price;
	double phone_screensize;
	int phone_batterylife;
	
	public:
		phone(double p_price = 0.0, double p_screensize = 0.0, double p_battery = 0.0)
		{
			phone_price = p_price;
			phone_screensize = p_screensize;
			phone_batterylife = p_battery;
			std::cout << "Contructed\n" ; 
		}
		
		~phone()
		{
			std::cout << "Destroyed\n" ; 
		}
		
		void setphone_brand(std::string);
		void setphone_material(std::string);
		void setphone_price(double);                                                  //Mutators
		void setphone_screensize(double);
		void setphone_batterylife(int);
		
		std::string getphone_brand()const;
		std::string getphone_material()const;                                         //Accessors
		double getphone_price()const;                                
		double getphone_screensize()const;
		int getphone_batterylife()const;
};



void phone::setphone_brand(std::string brand)
{
	phone_brand=brand;
};

void phone::setphone_material(std::string material)                                                       
{
	phone_material=material;
};

void phone::setphone_price(double price)
{
	phone_price=price;
};

void phone::setphone_screensize(double screensize)
{
	phone_screensize=screensize;
};

void phone::setphone_batterylife (int batterylife)
{
	phone_batterylife=batterylife;
};



std::string phone::getphone_brand()const 
{
	return phone_brand;
};
                                                                                 
std::string phone::getphone_material()const
{
	return phone_material;
};

double phone::getphone_price()const
{
	return phone_price;
};

double phone::getphone_screensize()const
{
	return phone_screensize;
};

int phone::getphone_batterylife()const
{
	return phone_batterylife;
};

#endif
		

