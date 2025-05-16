export const getOnlyDateFromUTC = (date) => {
  try {
    
    if(!date ) return "";
    const isoString = date;
    const newDate = new Date(isoString);
    const formattedDate = newDate.toISOString().slice(0, 10);

    return formattedDate;
  } catch (err) {
    console.error("Date formate error: ", err.message);
    return "";
  }
};

export const getFormattedDateTime=(date)=> {
  const now = new Date(date);
  
  let day = now.getDate();
  let month = now.getMonth() + 1; 
  let year = now.getFullYear();

  let hours = now.getHours();
  let minutes = now.getMinutes();
  
  day = day < 10 ? '0' + day : day;
  month = month < 10 ? '0' + month : month;
  
 
  let period = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12 || 12; 
  minutes = minutes < 10 ? '0' + minutes : minutes;

  return `${day}-${month}-${year} - ${hours}:${minutes}${period}`;
}


export const filterWithObject = (list, object) => {
  if (!list?.length) return [];

  return list.filter((item) => {
    return Object.keys(object).every((key) => {
      if (object[key] === "all") return object[key];
      return item[key]?.toString() === object[key]?.toString();
    });
  });
};

export const numberWithCommas = (x) => {
  const c = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return c;
};

export const conversionRate = (price, conversion, withComma = false) => {
  try {
    const pr = parseFloat(price);
    const con = parseFloat(conversion?.rate);
    const divided = 1 / con;
    const result = Math.round(pr * divided);
    return {
      identifier: conversion?.identifier,
      rate: withComma ? numberWithCommas(result) : result
    };
  } catch (error) {
    return {};
  }
};

export const tableDateFormate = (date) => {
  const isoDate = date;
  const newDate = new Date(isoDate);
  const dayOfWeek = newDate.toLocaleString("en-US", { weekday: "short" });
  const month = newDate.toLocaleString("en-US", { month: "short" });
  const dayOfMonth = newDate.getDate();
  const year = newDate.getFullYear();
  const formate = `${dayOfWeek}, ${month}-${dayOfMonth} ${year} `;
  return formate;
};

export const tableDateTimeFormate = (date) => {
  const isoDate = date;
  const newDate = new Date(isoDate);
  const dayOfWeek = newDate.toLocaleString("en-US", { weekday: "short" });
  const month = newDate.toLocaleString("en-US", { month: "short" });
  const dayOfMonth = newDate.getDate();
  const year = newDate.getFullYear();
  const hour =newDate.getUTCHours();
  const mint =newDate.getUTCMinutes();
  const formate = `${dayOfWeek}, ${month}-${dayOfMonth} ${year} - ${hour}:${mint} `;
  return formate;
};

export const compareDateWithCurrentDate = (date) => {
  const isoString = date;
  const givenDate = new Date(isoString);
  const currDate = new Date();
  return givenDate <= currDate;
};

export const srNo = (i, num1, num2) =>
  num1 / (num2 - 1) == Infinity ? i + 1 + 0 : i + 1 + num1 / (num2 - 1);

export const stringSplit = (variable, text) => {
  const keys = text.split(".");

  const value = keys.reduce((acc, key) => {
    return acc?.[key];
  }, variable);


  return value;
};

export const truncateText = (text, maxLength) => {
  return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
};




export const getOnlyDateAndTimeFromUTC = (date) => {
  try {
    const isoString = date;
    const newDate = new Date(isoString);
    const formattedDate = newDate.toISOString().slice(0, 16);

    return formattedDate;
  } catch (err) {
    console.error("Date formate error: ", err.message);
    return "";
  }
};