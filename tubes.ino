#include <DHT11.h>
DHT11 dht11(11);

const int trigPin1 = 12;  
const int echoPin1 = 13; 

const int trigPin2 = 2;  
const int echoPin2 = 3; 

long duration;
int distance;

long readUltrasonicDistanceCup()
{
  pinMode(trigPin2, OUTPUT);
  digitalWrite(trigPin2, LOW);
  delayMicroseconds(2);

  digitalWrite(trigPin2, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin2, LOW);
  pinMode(echoPin2, INPUT);

  return pulseIn(echoPin2, HIGH);
}

long readUltrasonicWaterLevel()
{
  pinMode(trigPin1, OUTPUT);
  digitalWrite(trigPin1, LOW);
  delayMicroseconds(2);

  digitalWrite(trigPin1, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin1, LOW);
  pinMode(echoPin1, INPUT);

  return pulseIn(echoPin1, HIGH);
}

void setup() {
  // put your setup code here, to run once:
  	Serial.begin(9600);  

  pinMode(8, OUTPUT);
  pinMode(9, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  Serial.println();
  int waterlevel = 0.01723 * readUltrasonicWaterLevel();
  int distanceCup = 0.01723 * readUltrasonicDistanceCup();
  int temp = dht11.readTemperature();

  Serial.print("Water Level: ");
  Serial.println(waterlevel);
  Serial.print("Distance: ");
  Serial.println(distanceCup);
  Serial.print(temp);
  Serial.println(" °C");
  
  if(((waterlevel > 5 && waterlevel <= 13) && distanceCup <= 10) && temp > 25){
    Serial.println("Tank is EMPTY");
    digitalWrite(8, HIGH);
    digitalWrite(9, HIGH);
  } else if (waterlevel <= 5 && distanceCup <= 10){
    Serial.println("Tank is FULL");
    digitalWrite(8, LOW);
    digitalWrite(9, LOW);
  } else {
    Serial.println("No Cup!");
    digitalWrite(8, LOW);
    digitalWrite(9, LOW);
  }

  delay(1500);
}
