@rem = '--*-Perl-*--
@echo off
if "%OS%" == "Windows_NT" goto WinNT
IF EXIST "%~dp0perl.exe" (
"%~dp0perl.exe" -x -S "%0" %1 %2 %3 %4 %5 %6 %7 %8 %9
) ELSE IF EXIST "%~dp0..\..\bin\perl.exe" (
"%~dp0..\..\bin\perl.exe" -x -S "%0" %1 %2 %3 %4 %5 %6 %7 %8 %9
) ELSE (
perl -x -S "%0" %1 %2 %3 %4 %5 %6 %7 %8 %9
)

goto endofperl
:WinNT
IF EXIST "%~dp0perl.exe" (
"%~dp0perl.exe" -x -S %0 %*
) ELSE IF EXIST "%~dp0..\..\bin\perl.exe" (
"%~dp0..\..\bin\perl.exe" -x -S %0 %*
) ELSE (
perl -x -S %0 %*
)

if NOT "%COMSPEC%" == "%SystemRoot%\system32\cmd.exe" goto endofperl
if %errorlevel% == 9009 echo You do not have Perl in your PATH.
if errorlevel 1 goto script_failed_so_exit_with_non_zero_val 2>nul
goto endofperl
@rem ';
#!/usr/bin/perl
#line 29
# $File: //depot/cpanplus/dist/bin/cpanp $
# $Revision: #8 $ $Change: 8345 $ $DateTime: 2003/10/05 19:25:48 $

use strict;
use vars '$VERSION';

use CPANPLUS;
$VERSION = CPANPLUS->VERSION;

use CPANPLUS::Shell qw[Default];
my $shell = CPANPLUS::Shell->new;

### if we're given a command, run it; otherwise, open a shell.
if (@ARGV) {
    ### take the command line arguments as a command
    my $input = "@ARGV";
    ### if they said "--help", fix it up to work.
    $input = 'h' if $input =~ /^\s*--?h(?:elp)?\s*$/i;
    ### strip the leading dash
    $input =~ s/^\s*-//;
    ### pass the command line to the shell
    ### exit with a useful return value on return
    exit not $shell->dispatch_on_input(input => $input, noninteractive => 1);
} else {
    ### open a shell for the user
    $shell->shell();
}

=head1 NAME

cpanp - The CPANPLUS launcher

=head1 SYNOPSIS

B<cpanp>

B<cpanp> S<[-]B<a>> S<[ --[B<no>-]I<option>... ]> S< I<author>... >

B<cpanp> S<[-]B<mfitulrcz>> S<[ --[B<no>-]I<option>... ]> S< I<module>... >

B<cpanp> S<[-]B<d>> S<[ --[B<no>-]I<option>... ]> S<[ --B<fetchdir>=... ]> S< I<module>... >

B<cpanp> S<[-]B<xb>> S<[ --[B<no>-]I<option>... ]>

B<cpanp> S<[-]B<o>> S<[ --[B<no>-]I<option>... ]> S<[ I<module>... ]>

=head1 DESCRIPTION

This script launches the B<CPANPLUS> utility to perform various operations
from the command line. If it's invoked without arguments, an interactive
shell is executed by default.

Optionally, it can take a single-letter switch and one or more arguments,
to perform the associated action on each argument.  A summary of the
available commands is listed below; C<cpanp -h> provides a detailed list.

    h                   # help information
    v                   # version information

    a AUTHOR ...        # search by author(s)
    m MODULE ...        # search by module(s)
    f MODULE ...        # list all releases of a module

    i MODULE ...        # install module(s)
    t MODULE ...        # test module(s)
    u MODULE ...        # uninstall module(s)
    d MODULE ...        # download module(s)
    l MODULE ...        # display detailed information about module(s)
    r MODULE ...        # display README files of module(s)
    c MODULE ...        # check for module report(s) from cpan-testers
    z MODULE ...        # extract module(s) and open command prompt in it

    x                   # reload CPAN indices

    o [ MODULE ... ]    # list installed module(s) that aren't up to date
    b                   # write a bundle file for your configuration

Each command may be followed by one or more I<options>.  If preceded by C<no>,
the corresponding option will be set to C<0>, otherwise it's set to C<1>.

Example: To skip a module's tests,

    cpanp -i --skiptest MODULE ...

Valid options for most commands are C<cpantest>, C<debug>, C<flush>, C<force>,
C<prereqs>, C<storable>, C<verbose>, C<md5>, C<signature>, and C<skiptest>; the
'd' command also accepts C<fetchdir>.  Please consult L<CPANPLUS::Configure>
for an explanation to their meanings.

Example: To download a module's tarball to the current directory,

    cpanp -d --fetchdir=. MODULE ...

=cut

1;

# Local variables:
# c-indentation-style: bsd
# c-basic-offset: 4
# indent-tabs-mode: nil
# End:
# vim: expandtab shiftwidth=4:

__END__
:endofperl
