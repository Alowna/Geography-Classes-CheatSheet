#include <nlohmann/json.hpp>
#include <httplib/httplib.h>
#include <vector>
#include <iostream>
#include <cmath>

using json = nlohmann::json;

#ifdef _WIN32
    #include <windows.h>
#else
    #include <cstdlib>
#endif

int main()
{
    httplib::Server server;


    server.Get("/test", [](const httplib::Request& req, httplib::Response& res){

        nlohmann::json testSent = {

        {"firstValue", "Working!"},

        {"secondValue", 2}

        };
    });

    server.Options("/coord", [](const httplib::Request& req, httplib::Response& res) {
        res.set_header("Access-Control-Allow-Origin", "*"); // Allow any origin
        res.set_header("Access-Control-Allow-Methods", "POST, GET, OPTIONS"); // Allow POST
        res.set_header("Access-Control-Allow-Headers", "Content-Type"); // Allow JSON headers
        res.status = 204; // 204 No Content
    });

    server.Post("/coord", [](const httplib::Request& req, httplib::Response& res)
    {

        nlohmann::json receivedData = json::parse(req.body);

        float longitudeVariationMinute = receivedData["longitudeVariationMinute"];
        float longitudeVariationSecond = receivedData["longitudeVariationSecond"];
        float latitudeVariationMinute = receivedData["latitudeVariationMinute"];
        float latitudeVariationSecond = receivedData["latitudeVariationSecond"];

        float mapLongitudeMinute = receivedData["mapLongitudeMinute"];
        float mapLongitudeSecond = receivedData["mapLongitudeSecond"];
        float mapLatitudeMinute = receivedData["mapLatitudeMinute"];
        float mapLatitudeSecond = receivedData["mapLatitudeSecond"];

        float longitudeVariationCentimeters = receivedData["longitudeVariationCentimeters"];
        float latitudeVariationCentimeters = receivedData["latitudeVariationCentimeters"];

        float localCentimetersLongitude = receivedData["localCentimetersLongitude"];
        float localCentimetersLatitude = receivedData["localCentimetersLatitude"];

        //all to seconds
        longitudeVariationSecond = (longitudeVariationMinute*60) + longitudeVariationSecond;
        latitudeVariationSecond = (latitudeVariationMinute*60) + latitudeVariationSecond;

        mapLongitudeSecond = (mapLongitudeMinute*60) + mapLongitudeSecond;
        mapLatitudeSecond = (mapLatitudeMinute*60) + mapLatitudeSecond;

        //longitude

        if(mapLongitudeSecond > longitudeVariationSecond)
        {
            longitudeVariationSecond = mapLongitudeSecond - longitudeVariationSecond;
        } else if(mapLongitudeSecond < longitudeVariationSecond)
        {
            longitudeVariationSecond -= mapLongitudeSecond;
        } else
        {
            std::cout<<"Not possible, invalid input"<<std::endl;
        }

            //Rule of three
            float localMinuteLongitude;
            float localSecondLongitude;

            localSecondLongitude =  (localCentimetersLongitude * longitudeVariationSecond) / longitudeVariationCentimeters;
            localSecondLongitude += mapLongitudeSecond;

            localMinuteLongitude = std::floor(localSecondLongitude/60);
            
            localSecondLongitude = (localSecondLongitude/60);
            localSecondLongitude = round((localSecondLongitude - std::floor(localSecondLongitude)) * 60);

        //latitude

        if(mapLatitudeSecond > latitudeVariationSecond)
        {
            latitudeVariationSecond = mapLatitudeSecond - latitudeVariationSecond;
        } else if(mapLatitudeSecond < latitudeVariationSecond)
        {
            latitudeVariationSecond -= mapLatitudeSecond;
        } else
        {
            std::cout<<"Not possible, invalid input"<<std::endl;
        }
            //Rule of three
            float localMinuteLatitude;
            float localSecondLatitude;

            localSecondLatitude =  (localCentimetersLatitude * latitudeVariationSecond) / latitudeVariationCentimeters;
            localSecondLatitude += mapLatitudeSecond;
            localMinuteLatitude = std::floor(localSecondLatitude/60);
            
            localSecondLatitude = (localSecondLatitude/60);
            localSecondLatitude = round((localSecondLatitude - std::floor(localSecondLatitude)) * 60);
            

        nlohmann::json toSendData = {
          {"localMinuteLongitude", localMinuteLongitude},
          {"localSecondLongitude", localSecondLongitude},
          {"localMinuteLatitude", localMinuteLatitude},
          {"localSecondLatitude", localSecondLatitude}  
        };


        res.set_header("Access-Control-Allow-Origin", "*"); 
        res.set_content(toSendData.dump(), "application/json");

    });

    server.listen("localhost",5000);

}
