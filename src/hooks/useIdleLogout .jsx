import { useEffect, useRef } from "react";

const useIdleLogout = (onLogout, timeout = 10 * 60 * 1000) => {
  // timeout is in milliseconds (default: 10 minutes)



  const timer = useRef(null);

  const resetTimer = () => {
    if (timer.current) clearTimeout(timer.current);
    timer.current = setTimeout(() => {
      onLogout(); // Trigger logout after inactivity
    }, timeout);
  };

  useEffect(() => {
    // Define activity events
    const activityEvents = ["mousemove", "mousedown", "keypress", "scroll", "touchstart"];

    const handleActivity = () => {
      resetTimer(); // Reset timer on user activity
    };

    // Add event listeners
    activityEvents.forEach((event) => {
      window.addEventListener(event, handleActivity);
    });

    resetTimer(); // Start the timer initially

    return () => {
      // Cleanup: Remove event listeners and timer on unmount
      activityEvents.forEach((event) => {
        window.removeEventListener(event, handleActivity);
      });
      if (timer.current) clearTimeout(timer.current);
    };
  }, [onLogout, timeout]);
};

export default useIdleLogout;
