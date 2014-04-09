Solar_Nexus
Solar Power Wireless Mesh/Access Points

The Solar-Nexus project is a fork(update:most likely not 'forked' correctly according to some reading I just did on how to correctly fork projects on Github) of the HSMM-Pi by github.com/urlgrey/hsmm-pi project. We add certain features for purposes of meeting more specific project requirements:

1) Access Point ability:
	This feature uses two wiresless devices(wlan0/wlan1) and routes the devices together using iptables on non-gateway(no ethernet) nodes, allowing users to use security and the ability to be forwarded on to the Ad Hoc mesh which will use a few techniques to obscure itself from non-node connections. This at least gives some basic security measures. This also allows for the use of expanding the possibilites with Model A versions of the Raspberry Pi and take advantage of it's lower expense and lower power consumption. 
Ad Hoc is also problematic enough that I felt that computers would be better of connecting to it via standard WLAN AP mode since:
	a) Windows 8 requires lenghty configuration using >net stat on the Windows command prompt and that doesn't even work consistantly
	b) One of our team members with a Win 7 machine encountered random full system shutdowns when trying to connect to the Ad Hoc network
	c) The interaction with Ad Hoc connections is slow. For instance, all systems respond poorly when the signal changes or is lost(the connected systems don't notify of any problems for quite a long time after a connection is lost).
	
2) Updated web site:
	Not only has the design of the website been updated, based on MIT's CakePHP framework, but the device web page includes the added features. 
