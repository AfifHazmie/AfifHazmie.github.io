//AFIF HAZMIE ARSYAD BIN AGUS
//A20EC0176	
#include<iostream>
#include<cmath>
#define PI 3.14159

using namespace std ;

//summation
int sum(int num1, int num2){
	return num1+num2 ;
}

//multiplication
int mul(int num1, int num2){
	return num1*num2 ;
}

//subtraction
int sub(int num1, int num2){
	return num1-num2 ;
}

//division
int div(int num1,int num2){
	return num1/num2 ;
}

//sin
double Sine(double degree){
	double rad = degree * PI/180 ; 
	double result = sin(rad) ;
	return result ;
}

//cos
double Cos(double degree1){
	double rad = degree1 * PI/180 ; 
	double result = cos(rad) ;
	return result ;
}

//tangent
double Tan(double degree2){
	double rad = degree2 * PI/180 ; 
	double result = tan(rad) ;
	return result ;
}

int main()
{	
	int Sresult = sum(20, 100) ;
	cout << "The Summation of N1 and N2 is " << Sresult << endl ;
	
	int Mresult = mul(20, 5) ;
	cout << "The Multiplication of N1 and N2 is " << Mresult << endl ;
	
	int S1result = sub(20, 10) ;
	cout << "The Subtraction of N1 and N2 is " << S1result << endl ;
	
	int Dresult = div(100, 5) ;
	cout << "The Division of N1 and N2 is " << Dresult << endl << endl ;
	
	
	float sineResult = Sine(130) ;
	cout << "The Sine of 130 is " << sineResult << endl ;
	
	float cosResult = Cos(30) ; 
	cout << "The Cosine of 30 is " << cosResult << endl ;
	
	float tanResult = Tan(55) ;
	cout << "The Tangent of 55 is " << tanResult << endl << endl ;
	
	
	return 0 ;
}

