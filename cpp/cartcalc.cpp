#include <nlohmann/json.hpp>
#include <httplib/httplib.h>
#include <vector>
#include <iostream>

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
           {"firstValue", "punhetassos"},
           {"secondValue", 2} 
        };

        res.set_header("Access-Control-Allow-Origin", "*"); // Adiciona o cabeçalho CORS
        res.set_content(testSent.dump(), "application/json");

    });

    server.listen("localhost",8080);

}
