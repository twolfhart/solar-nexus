Solar_Nexus

The Solar-Nexus project is a fork of the HSMM-Pi project in which certain features are added:

1) Access Point ability:
	This feature uses two wiresless devices on non-gateway nodes, allowing users to use security and the ability to be forwarded on to the Ad Hoc mesh which will use a few techniques to obscure itself from non-node connections. This at least gives some basic security measures.
Ad Hoc is also problematic enough that I felt that computers would be better of connecting to it via standard WLAN AP mode since:
	a) Windows 8 requires lenghty configuration using net stat on the Windows command prompt and that doesn't even work correctly
	b) One of our team members with a Win 7 machine would have random full system shutdowns when trying to connect to Ad Hoh
	c) The interaction with Ad Hoc connections is slow. For instance, all systems respond poorly when the signal changes or is lost(the connected systems don't notify of any problems for quite a long time after a connection is lost).
	
2) Updated web site:
	Not only has the design of the website been updated, based on MIT's CakePHP framework, but the device web page includes the added features. 
