"use strict";

window.ACCESS_POINT = "https://api.edamam.com/api/recipes/v2";
const APP_ID = "a6c5317f";
const API_KEY = "0c77d93ee9ab2e38084680a1bf0da0d0";
const TYPE = "public";

/** 
 * 
 * @param {Array} queries 
 * @param {Function} successCallback 
 */

export const fetchData = async function(queries, successCallback){
    const query = queries?.join("&")
        .replace(/,/g, "=")
        .replace(/ /g, "%20")
        .replace(/\+/g, "%2B");

    const url = `${ACCESS_POINT}?app_id=${APP_ID}&app_key=${API_KEY}&type=${TYPE}${query ? `&${query}` : ""}`;
    const response = await fetch(url);

    if(response.ok){
        const data = await response.json();
        successCallback(data);
    }
};