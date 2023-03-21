#include <iostream>
#include <stdlib.h>
using namespace std;

void exitprogram()
{
	cout << "\nThank you for choosing our service. Have a nice day." << endl;
	exit(1);
}

/******************************************************
					class VDM
*******************************************************/
class VDM
{
	private:
		char vaccination_status;
	public: 
		VDM(){}
		void set_vaccine_status(char);
		char get_vaccine_status();
		void vaccine_application();	
};
void VDM::set_vaccine_status(char vs)
{
	vaccination_status = vs;
}
char VDM::get_vaccine_status()
{	
	return vaccination_status;	
}
void VDM::vaccine_application()
{
	cout << "Below are the steps to register for vaccine.\n" << endl;
	cout << "1) Register name, ID number and contact number." << endl;
	cout << "2) Choose prefered vaccine." << endl;
	cout << "3) Choose prefered hospital/centre to get vaccine shot." << endl;
	cout << "4) Choose prefered ward to wait for vaccine shot" << endl;
	cout << "5) A doctor will automatically be designated to each patient." << endl;
	cout << "6) Summary of all information will be display at the end of the program." << endl;
	
	cout << "\nOpening Registration Application." << endl;
	system("pause");
	system("CLS");
}

/******************************************************
					class Person
*******************************************************/
class Person
{
	private:
		string firstname;
		string lastname;
		int idnumber;
		int contactnumber;
		string fullname;
	public:
		Person(){}
		string getfullname(string, string);
		void setidnumber(int);
		int getidnumber();
		void setcontactnumber(int);
		int getcontactnumber();	
};
string Person::getfullname(string a1, string a2)
{
	fullname = (a1.append(" ")).append(a2);
	return fullname;
}
void Person::setidnumber(int a3)
{
	idnumber = a3;
}
int Person::getidnumber()
{
	return idnumber;
}
void Person::setcontactnumber(int a4)
{
	contactnumber = a4;
}
int Person::getcontactnumber()
{
	return contactnumber;
}

/******************************************************
					class Patient
*******************************************************/
class Patient
{
	private:
		int idnumber;
		int contactnumber;
		string fullname;
	public:
		Patient(){}
		void setfullname(string);
		string getfullname();
		void setidnumber(int);
		int getidnumber();
		void setcontactnumber(int);
		int getcontactnumber();	
		
};
void Patient::setfullname(string a5)
{
	fullname = a5;
}
string Patient::getfullname()
{
	return fullname;
}
void Patient::setidnumber(int a3)
{
	idnumber = a3;
}
int Patient::getidnumber()
{
	return idnumber;
}
void Patient::setcontactnumber(int a4)
{
	contactnumber = a4;
}
int Patient::getcontactnumber()
{
	return contactnumber;
}

/******************************************************
					class Vaccine
*******************************************************/
class Vaccine
{
	private:
		string vaccinetype;
		int dosage;
	public:
		Vaccine(){}
		void setvaccinetype(int);	
		string getvaccinetype();
		void setdosage(int);
		int getdosage();
};
void Vaccine::setvaccinetype(int choice)
{
	if(choice == 1)
		vaccinetype = "Alpha";
	else if(choice == 2)
		vaccinetype = "Bravo";
	else if(choice == 3)
		vaccinetype = "Charlie";
	else if(choice == 4)
		vaccinetype = "Delta";
	else
		cout << "Error." << endl;	
}
string Vaccine::getvaccinetype()
{
	return vaccinetype;
}
void Vaccine::setdosage(int choice)
{
	dosage = choice;
}
int Vaccine::getdosage()
{
	return dosage;
}

/******************************************************
					class Hospital
*******************************************************/
class Hospital
{
	private:
		string hospitalname;
	public:
		Hospital(){}
		void sethospitalname(int);	
		string gethospitalname();
};
void Hospital::sethospitalname(int choice)
{
	if(choice == 1)
		hospitalname = "Echo";
	else if(choice == 2)
		hospitalname = "Foxtrot";
	else if(choice == 3)
		hospitalname = "Golf";
	else if(choice == 4)
		hospitalname = "Hotel";	
	else
		cout << "Error." << endl;		
}
string Hospital::gethospitalname()
{
	return hospitalname;
}

/******************************************************
					class Doctor
*******************************************************/
class Doctor
{
	private:
		string doctorname;
		int doctoridnumber;
		int doctorcontactnumber;
	public:
		Doctor(){}
		void setdoctor(int);
		string getdoctorname();
		int getdoctoridnumber();
		int getdoctorcontactnumber();
};
void Doctor::setdoctor(int choice)
{
	switch(choice)
	{
		case 1:
			{
				doctorname = "India";
				doctoridnumber = 3111;
				doctorcontactnumber = 1122;
				break;
			}
		case 2:
			{
				doctorname = "Julliet";
				doctoridnumber = 3112;
				doctorcontactnumber = 3344;
				break;
			}
		case 3:
			{
				doctorname = "Kilo";
				doctoridnumber = 3113;
				doctorcontactnumber = 5566;
				break;
			}		
		case 4:
			{
				doctorname = "Lima";
				doctoridnumber = 3114;
				doctorcontactnumber = 7788;
				break;
			}
		default:
			{
				cout << "Error." << endl;
				break;
			}		
	}
}
string Doctor::getdoctorname()
{
	return doctorname;
}
int Doctor::getdoctoridnumber()
{
	return doctoridnumber;
}
int Doctor::getdoctorcontactnumber()
{
	return doctorcontactnumber;
}

/******************************************************
					int main
*******************************************************/
int main()
{
	VDM v;
	char answer; 
	
	cout << "\n\n\t\t\tWelcome to Vaccination Distribution centre." << endl;
	cout << "\n\n\t\t\tAre you vaccinated yet (y/n)?" << endl;
	cout << "\t\t\tIf you choose 'y', the program will be terminated." << endl;
	cout << "\t\t\tAnswer: ";
	cin >> answer;	
	
	if(answer == 'y')
		exitprogram();
	else
	{
		v.set_vaccine_status(answer);
		cout << "\n\t\t\tYou have choosen the answer = " << v.get_vaccine_status() << " which means 'NO'.";
		cout << "\n\t\t\tRedirecting to VDM Registration site." << endl;	
		system("pause");
		system("CLS");	
		v.vaccine_application();
	}
	
	Person p;
	string a1, a2, a5 = "";
	int a3, a4;
	
	cout << "<<<<<<<<<<<<<<<<<<<<Registration Form>>>>>>>>>>>>>>>>>>>>" << endl;
	cout << "<<<<<               Registration Form               >>>>>" << endl;
	cout << "<<<<<<<<<<<<<<<<<<<<Registration Form>>>>>>>>>>>>>>>>>>>>" << endl << endl << endl;
	
	cout << "Enter your first name: ";
	cin >> a1;
	cout << "Enter yout last name: ";
	cin >> a2;
	cout << "Enter your ID 4 digit numbers (just type '123'): ";
	cin >> a3;
	cout << "Enter you contact number (just type '456'): ";
	cin >> a4;		
	a5 = p.getfullname(a1, a2); p.setidnumber(a3); p.setcontactnumber(a4);
	
	system("pause");
	system("CLS");
	
	cout << "\t\tRegistration complete." << endl << endl;
	cout << "Name: " << a5 << endl;
	cout << "ID number: " << p.getidnumber() << endl;
	cout << "Contact number: " << p.getcontactnumber() << endl << endl;
	cout << "Press any key to continue.";
	
	system("pause");
	system("CLS");
	
	Patient pa;
	pa.setfullname(a5); pa.setidnumber(a3); pa.setcontactnumber(a4);
	
	cout << "<<<<<<<<<<<<<<<<<<<<Patient Form>>>>>>>>>>>>>>>>>>>>" << endl;
	cout << "<<<<<               Patient Form               >>>>>" << endl;
	cout << "<<<<<<<<<<<<<<<<<<<<Pateint Form>>>>>>>>>>>>>>>>>>>>" << endl << endl << endl;		
	
	cout << "Here is your patient form." << endl << endl;
	cout << "Name: " << pa.getfullname() << endl;
	cout << "ID number: " << pa.getidnumber() << endl;
	cout << "Contact number: " << pa.getcontactnumber() << endl << endl;	
	
	system("pause");
	system("CLS");
	
	Vaccine vc;
	int choice;
	
	cout << "\t<--------------------------------------------------------------->" << endl;
	cout << "\t<--------------------Vaccine Types Available-------------------->" << endl;	
	cout << "\t<--------------------------------------------------------------->" << endl << endl;
	cout << "\tWelcome " << pa.getfullname() << " to Vaccine Selection Site." << endl << endl;
	
	cout << "\t1) Vaccine A" << endl;
	cout << "\t2) Vaccine B" << endl;	
	cout << "\t3) Vaccine C" << endl;	
	cout << "\t4) Vaccine D" << endl << endl;
	
	do
	{
		cout << "\tPlease pick your prefered Vaccine." << endl;
		cout << "\tYour choice must not above 4 or below 1." << endl << endl;
		cout << "\tEnter your choice of vaccine: ";
		cin >> choice;	
	}while((choice < 0)||(choice > 5));
	vc.setvaccinetype(choice);
	
	cout << "\n\t1) 1 Dosage" << endl;
	cout << "\t2) 2 Dosage" << endl;	
	cout << "\t3) 3 Dosage" << endl;	
	cout << "\t4) 4 Dosage" << endl << endl;
	
	do
	{
		cout << "\tPlease pick your prefered dosage or shots." << endl;
		cout << "\tDosage must not above 4 or below 1." << endl << endl;
		cout << "\tEnter your choice of vaccine: ";
		cin >> choice;	
	}while((choice < 0)||(choice > 5));
	vc.setdosage(choice);
	
	cout << endl << endl;
	cout << "\tYour have successfully select " << vc.getdosage() << " dosage of Vaccine " << vc.getvaccinetype() << endl;
	cout << "\tPlease press any key to continue your registration." << endl;
	
	system("pause");
	system("CLS");	
	
	Hospital h;
	
	cout << "\t<--------------------Appointment-------------------->" << endl;
	cout << "\t<--------------------Appointment-------------------->" << endl;	
	cout << "\t<--------------------Appointment-------------------->" << endl << endl;
	cout << "\tWelcome " << pa.getfullname() << " to Appointment Site." << endl << endl;
	
	cout << "\t1) Hospital E" << endl;
	cout << "\t2) Hospital F" << endl;
	cout << "\t3) Hospital G" << endl;
	cout << "\t4) Hospital H" << endl << endl;
	
	do
	{
		cout << "\tPlease pick when would you like to have the appointment." << endl;
		cout << "\tYour choice must not above 5 or below 1." << endl << endl;
		cout << "\tEnter your choice: ";
		cin >> choice;	
	}while((choice < 0)||(choice > 5));
	h.sethospitalname(choice);
	
	cout << "\n\tYou have choosen Hospital " << h.gethospitalname() << " to set your appointment." << endl;
	
	system("pause");
	system("CLS");
	
	Doctor d;
	
	cout << "\t<--------------------Appointment-------------------->" << endl;
	cout << "\t<--------------------Appointment-------------------->" << endl;	
	cout << "\t<--------------------Appointment-------------------->" << endl << endl;
	cout << "\tWelcome " << pa.getfullname() << " to Appointment Site." << endl << endl;	
		
	cout << "\t1) Doctor I" << endl;
	cout << "\t2) Doctor J" << endl;
	cout << "\t3) Doctor K" << endl;
	cout << "\t4) Doctor L" << endl << endl;
	
	do
	{
		cout << "\tPlease choose your doctor to have the appointment." << endl;
		cout << "\tYour choice must not above 5 or below 1." << endl << endl;
		cout << "\tEnter your choice: ";
		cin >> choice;	
	}while((choice < 0)||(choice > 5));
	d.setdoctor(choice);
	
	cout << "\n\tYou have choosen Doctor " << d.getdoctorname() << " to have the vaccination appoinment." << endl;
	
	system("pause");
	system("CLS");
	
	cout << "OOOOOOOOOO0000000000<<<<<<<<<< Registration Finished>>>>>>>>>>0000000000OOOOOOOOOO" << endl;
	cout << "OOOOOOOOOO0000000000<<<<<<<<<< Registration Finished>>>>>>>>>>0000000000OOOOOOOOOO" << endl;
	cout << "OOOOOOOOOO0000000000<<<<<<<<<< Registration Finished>>>>>>>>>>0000000000OOOOOOOOOO" << endl << endl << endl;
	
	cout << "Here is your full information." << endl << endl;
	
	cout << "<-----Patient Details----->" << endl << endl;
	cout << "Name: " << pa.getfullname() << endl;
	cout << "ID number: " << pa.getidnumber() << endl;
	cout << "Contact number: " << pa.getcontactnumber() << endl;
	cout << "Type of vaccine requested: " << vc.getvaccinetype() << endl;
	cout << "Number of dosage requested: " << vc.getdosage() << endl << endl;
	
	cout << "<-----Appointment Details----->" << endl << endl;
	cout << "Hospital Name: Hospital " << h.gethospitalname() << endl;
	cout << "Doctor Name: " << d.getdoctorname() << endl;
	cout << "Doctor ID number: " << d.getdoctoridnumber() << endl;
	cout << "Doctor Contact number: " << d.getdoctorcontactnumber() << endl;


	return 0;
}






