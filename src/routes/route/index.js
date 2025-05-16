import React from "react";

/**
 * Auth Pages
 */

export const DashboardPage = React.lazy(() =>
  import("../../pages/authPages/DashboardPages/DashboardPage").then((module) => ({
    default: module.default,
  }))
);
export const LoginPage = React.lazy(() =>
  import("../../pages/authPages/LoginPage").then((module) => ({
    default: module.default,
  }))
);

export const SignUpPage = React.lazy(() =>
  import("../../pages/authPages/SingUpPage").then((module) => ({
    default: module.default,
  }))
);

export const ForgetPasswordPage = React.lazy(() =>
  import("../../pages/authPages/ForgetPasswordPage").then((module) => ({
    default: module.default,
  }))
);

export const ForgetPasswordOTPPage = React.lazy(() =>
  import("../../pages/authPages/ForgetPasswordOTPPage").then((module) => ({
    default: module.default,
  }))
);
export const MainMenu = React.lazy(() =>
  import("../../pages/protectedPages/MainMenu/MainMenu").then((module) => ({
    default: module.default,
  }))
);

/**
 * Protected Pages
 */
// export const DashboardPage = React.lazy(() =>
//   import("../../pages/protectedPages/DashboardPages/DashboardPage").then(
//     (module) => ({
//       default: module.default,
//     })
//   )
// );

export const Favorite = React.lazy(() =>
  import("@/pages/protectedPages/Favorite/Favorite").then((module) => ({
    default: module.default,
  }))
);

export const Restaurants = React.lazy(() =>
  import("@/pages/protectedPages/Restaurants/Restaurants").then((module) => ({
    default: module.default,
  }))
);

// export const MainMenu = React.lazy(() =>
//   import("@/pages/protectedPages/MainMenu/MainMenu").then((module) => ({
//     default: module.default,
//   }))
// );

export const SingleRestaurant = React.lazy(() =>
  import("@/pages/protectedPages/SingleRestaurant/SingleRestaurant").then((module) => ({
    default: module.default,
  }))
);
export const ProfileScreen = React.lazy(() =>
  import("@/pages/protectedPages/ProfileScreen/ProfileScreen").then((module) => ({
    default: module.default,
  }))
);
export const CheckOut = React.lazy(() =>
  import("@/pages/protectedPages/CheckOut/CheckOut").then((module) => ({
    default: module.default,
  }))
);