#ifndef CAR_H
#define CAR_H
#include<string>


class car

{
	int caryear;
	std::string car_name;
	std::string car_type;
	
	public:
		void setcaryear(int);
		void setcar_name(std::string);
		void setcar_type(std::string);
		int getcaryear()const;
		int getcarmodel()const;
		std::string getcar_name()const;
		std::string getcar_type()const;
};

void car::setcaryear(int year)
{
	caryear=year;
};

void car::setcar_name(std::string name)
{
	car_name=name;
};

void car::setcar_type(std::string type)
{
	car_type=type;
};

int car::getcaryear()const
{
	return caryear;
};

std::string car::getcar_name()const
{
	return car_name;
};

std::string car::getcar_type()const
{
	return car_type; 
};

#endif

