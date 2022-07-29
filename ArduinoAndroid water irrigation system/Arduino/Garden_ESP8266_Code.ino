#include <ESP8266WiFi.h>
#include <FirebaseArduino.h>
#define PIN_PUMP BUILTIN_LED
#define FIREBASE_HOST "iot-project-54031.firebaseio.com"
#define FIREBASE_AUTH "nhk5csKwhWtLTwj760Kz0fxTYSpA4OWDOk2Vutr4"
#define WIFI_SSID "I Believe Wi Can Fi"
#define WIFI_PASSWORD "IBWCF#69"

void setup() {
  Serial.begin(9600);
  pinMode(PIN_PUMP, OUTPUT);

  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println();
  Serial.print("connected: ");
  Serial.println(WiFi.localIP());

  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
}

void loop() {

  int humidityGet = Firebase.getString("set").toInt();
  int humidityRaw = analogRead(A0);
  int humidityReal = map(humidityRaw, 1023, 0, 0, 100);
  if (humidityReal > humidityGet) {
    digitalWrite(PIN_PUMP, HIGH);
  } else {
    digitalWrite(PIN_PUMP, LOW);
  }
  Firebase.setInt("humidity", humidityReal);
  Serial.print(humidityGet);
  Serial.print(humidityReal);
  
}
