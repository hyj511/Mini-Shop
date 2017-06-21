# Mini-Shop

An application using Apache Cordova, Ionic Framework, and Typescript. Currently supporting iOS, Android and Windows 10.

## Requirements
1. node.js
2. Cordova and Ionic - npm install cordova ionic
3. TypeScript - npm install typescript
4. Gulp - npm install gulp
5. Bower - npm install bower

## Getting Started

With VS Code:
* Clone this repository.
* Run `npm install` from the project root.
* Run `bower install` from the project root.
* Add android / iOS / windows platform to your project by running `ionic platform add <platform name>` in a terminal from your project root.
* Build the project by running gulp tsc and then `ionic build <platform name>`
* Deploy to device or emulator by running `ionic run <platform name>` or `ionic emulate <platform name>`
* Success

** Note: To improve your Cordova development workflow, install [VS Code Cordova extension](https://marketplace.visualstudio.com/items?itemName=vsmobile.cordova-tools). 
* Launch the VS Code Command Palette – (Ctrl+Shift+P on Windows, Cmd+Shift+P on Mac) – and type the following command and hit Enter: 
> ext install cordova-tools

With Visual Studio:
* Clone this repository.
* Open the ionic-typescript-blank.sln in Visual Studio.
* Open Task Runner window by pressing Ctrl+Alt+Bkspce. 
** Note: It is important that the task runner window be open in VS while building the project. You can also use "gulp watch" task to enable live reload in browser based debugging scenarios.    
* Install npm packages by going to your Solution Explorer -> Dependencies -> npm and clicking on 'Restore Packages'. 
* Once packages are restored, build the project and deploy it on Ripple or an android emulator.  
* Success