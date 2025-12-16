<div style="font-family: Arial, sans-serif; background: #f8fafc; padding: 32px;">
	<div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #e2e8f0; padding: 32px;">
		<div style="text-align: center; margin-bottom: 24px;">
			<img src="{{ asset('logo.png') }}" alt="Logo" style="height:30px; margin-bottom: 16px;">
			<h1 style="font-size: 24px; color: #1e293b; margin: 0;">Project Update</h1>
		</div>
		<div style="font-size: 16px; color: #334155; margin-bottom: 24px;">
			{!! $content !!}
		</div>
		@if(isset($attachments_html) && !empty($attachments_html))
			{!! $attachments_html !!}
		@endif
		<div style="text-align: center; margin-bottom: 24px;">
			<a href="{{ $url }}" style="display: inline-block; background: #cea926; color: #fff; padding: 12px 32px; border-radius: 6px; text-decoration: none; font-weight: bold;">View Project in your Dashboard</a>
		</div>
		<div style="font-size: 12px; color: #64748b; text-align: center;">
			This is an automated message. Please do not reply.<br>
			&copy; {{ date('Y') }} JaeVee
		</div>
	</div>
</div>
